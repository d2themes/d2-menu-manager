<?php

namespace D2\Theme;

class MenuManager extends Component
{
    const ADD = 'add';
    const REMOVE = 'remove';

    public function init()
    {
        if (array_key_exists(self::ADD, $this->config)) {
            $this->add($this->config[self::ADD]);
        }

        if (array_key_exists(self::REMOVE, $this->config)) {
            $this->remove($this->config[self::REMOVE]);
        }
    }

    protected function add(array $nav_menus)
    {
        foreach ($nav_menus as $nav_menu) {
            /**
             * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
             */
            register_nav_menu($nav_menu[Menu::SLUG], $nav_menu[Menu::DESCRIPTION]);
        }
    }

    protected function remove(array $nav_menu_slugs)
    {
        /**
         * @link https://developer.wordpress.org/reference/functions/unregister_nav_menu/
         */
        array_map('unregister_nav_menu', $nav_menu_slugs);
    }
}
