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

namespace dead\console\controller;

class main {
    /* @var \phpbb\config\config */

    protected $config;

    /* @var \phpbb\controller\helper */
    protected $helper;

    /* @var \phpbb\template\template */
    protected $template;

    /* @var \phpbb\user */
    protected $user;

    /**
     *
     * @param \phpbb\config\config		$config
     * @param \phpbb\controller\helper	$helper
     * @param \phpbb\template\template	$template
     * @param \phpbb\user				$user
     */
    public function __construct(\phpbb\config\config $config, \phpbb\controller\helper $helper, \phpbb\template\template $template, \phpbb\user $user) {
        $this->config = $config;
        $this->helper = $helper;
        $this->template = $template;
        $this->user = $user;
    }

    /**
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle() {

        return $this->helper->render('console_body.html', $this->user->lang('DEAD_CONSOLE_PAGE'));
    }

}
