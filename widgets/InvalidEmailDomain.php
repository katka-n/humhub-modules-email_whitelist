<?php

/**
 * Connected Communities Initiative
 * Copyright (C) 2016 Queensland University of Technology
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

namespace humhub\modules\email_whitelist\widgets;

use Yii;
use humhub\modules\user\models\User;
use humhub\models\Setting;


/**
 * InvalidEmailDomain. 
 * Displays a message informing the user that their email
 * domain isn't on the list of approved email domains.
 * 
 * @package email_whitelist.InvalidEmailDomain
 * @since 0.5
 * @author Ben
 */
class InvalidEmailDomain extends \yii\base\Widget
{

    /**
     * The message
     *
     * @var string
     */
    public $message;


    /**
     * Executes the widget.
     */
    public function run()
    {
        return $this->render('invalidEmailDomain', array(
            'message' => $this->message
        ));
    }
    
}


