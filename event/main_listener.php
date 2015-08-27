<?php

/*
 * phpBB Extension - Console
 * Copyright (C) 2015 Matthew Vanderende <matthew@vanderende.ca>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 */

namespace dead\console\event;

/**
 * @ignore
 */
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Event listener
 */
class main_listener implements EventSubscriberInterface {

    static public function getSubscribedEvents() {
        return array(
            'core.user_setup' => 'load_language_on_setup',
            'core.page_header' => 'add_page_header_link',
        );
    }

    /* @var \phpbb\controller\helper */

    protected $helper;

    /* @var \phpbb\template\template */
    protected $template;

    /**
     *
     * @param \phpbb\controller\helper	$helper	Controller helper object
     * @param \phpbb\template $template Template object
     */
    public function __construct(\phpbb\controller\helper $helper, \phpbb\template\template $template) {
        $this->helper = $helper;
        $this->template = $template;
    }

    public function load_language_on_setup($event) {
        $lang_set_ext = $event['lang_set_ext'];
        $lang_set_ext[] = array(
            'ext_name' => 'dead/console',
            'lang_set' => 'common',
        );
        $event['lang_set_ext'] = $lang_set_ext;
    }

    public function add_page_header_link($event) {
        $this->template->assign_vars(array(
            'U_DEAD_CONSOLE_PAGE' => $this->helper->route('dead_console_controller'),
        ));
    }

}
