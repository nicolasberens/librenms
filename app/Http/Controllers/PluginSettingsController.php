<?php

namespace App\Http\Controllers;

use App\Models\Plugin;
use Illuminate\Http\Request;
use LibreNMS\Interfaces\Plugins\Hooks\SettingsHook;
use LibreNMS\Interfaces\Plugins\PluginManagerInterface;
use LibreNMS\Util\Notifications;

class PluginSettingsController extends Controller
{
    public function __invoke(PluginManagerInterface $manager, Plugin $plugin): \Illuminate\Contracts\View\View
    {
        if (! $manager->pluginEnabled($plugin->plugin_name)) {
            abort(404, trans('plugins.errors.disabled', ['plugin' => $plugin->plugin_name]));
        }

        $data = array_merge([
            // fallbacks to prevent exceptions
            'title' => trans('plugins.settings_page', ['plugin' => $plugin->plugin_name]),
            'plugin_name' => $plugin->plugin_name,
            'plugin_id' => Plugin::where('plugin_name', $plugin->plugin_name)->value('plugin_id'),
            'content_view' => 'plugins.missing',
            'settings' => [],
        ],
            $manager->call(SettingsHook::class, [], $plugin->plugin_name)[0] ?? []
        );

        return view('plugins.settings', $data);
    }

    public function update(Request $request, Plugin $plugin): \Illuminate\Http\RedirectResponse
    {
        $plugin->fill($this->validate($request, [
            'plugin_active' => 'in:0,1',
            'settings' => 'array',
        ]));

        if ($plugin->isDirty('plugin_active') && $plugin->plugin_active == 1) {
            // enabling plugin delete notifications assuming they are fixed
            Notifications::remove("Plugin $plugin->plugin_name disabled");
        }

        $plugin->save();

        return redirect()->back();
    }
}
