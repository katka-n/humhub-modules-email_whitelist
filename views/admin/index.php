<?php
/**
 * Connected Communities Initiative
 * Copyright (C) 2016  Queensland University of Technology
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;

use yii\data\ActiveDataProvider;
?>
<div class="panel panel-default">
    <div class="panel-heading"><strong>Add</strong> Whitelisted Email</div>
    <div class="panel-body">
        <ul class="nav nav-pills">
            <li class="active"><a
                    href="<?php echo Url::toRoute('index'); ?>">Overview</a>
            </li>
            <li>
                <a href="<?php echo Url::toRoute('add'); ?>">Add Whitelisted Record</a>
            </li>
        </ul>
        <br />
        <p>Enabling this module will force Humhub to only accept registrations from users with an e-mail that matches a domain from this list,
            </b> or the user whose e-mail was explicitly added to the whitelist.</p>
        <br>
        <p><b>Example 1</b><br />Domain: gmail.com
        <table>
        	<tr>
        		<td><b>Registration Accepted</b><br />Email: ben@gmail.com</td>
        		<td style="padding-left:20px;"><b>Registration Rejected</b><br />Email: ben@example.com</td>
    		</tr>
		</table>
        <br><br>
        <p><b>Example 2</b><br />e-mail: ben@gmail.com
        <table>
            <tr>
                <td><b>Registration Accepted</b><br />Email: ben@gmail.com</td>
                <td style="padding-left:20px;"><b>Registration Rejected</b><br />Email: adam@gmail.com</td>
            </tr>
        </table>
		</p>

        <?php
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                [
                    'attribute' => 'id',
                    'options' => ['width' => '40px'],
                    'format' => 'raw',
                    'value' => function($data) {
                        return $data->id;
                    },
                ],
                'domain',
                [
                    'header' => 'Actions',
                    'class' => 'yii\grid\ActionColumn',
                    'options' => ['width' => '80px'],
                    'buttons' => [
                        'update' => function($url, $model) {
                            return Html::a('<i class="fa fa-pencil"></i>', Url::toRoute(['edit', 'id' => $model->id]), ['class' => 'btn btn-primary btn-xs tt']);
                        },
                        'delete' => function($url, $model) {
                            return Html::a('<i class="fa fa-times"></i>', Url::toRoute(['delete', 'id' => $model->id]), ['class' => 'btn btn-danger btn-xs tt']);
                        }
                    ],
                ],
            ],
        ]);

        /*$this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'user-grid',
            'dataProvider' => $model->resetScope()->search(),
            'itemsCssClass' => 'table table-hover',
            'columns' => array(
                array(
                    'name' => 'domain',
                    'header' => 'Domain',
                ),
                array(
                    'class' => 'CButtonColumn',
                    'template' => '{update}{deleteOwn}',
                    'updateButtonUrl' => 'Yii::app()->createUrl("//email_whitelist/admin/edit", array("id"=>$data->id));',
                    'htmlOptions' => array('width' => '90px'),
                    'buttons' => array
                        (
                        'update' => array
                            (
                            'label' => '<i class="fa fa-pencil"></i>',
                            'imageUrl' => false,
                            'options' => array(
                                'style' => 'margin-right: 3px',
                                'class' => 'btn btn-primary btn-xs tt',
                                'data-toggle' => 'tooltip',
                                'data-placement' => 'top',
                                'title' => '',
                                'data-original-title' => Yii::t('AdminModule.views_user_index', 'Edit user account'),
                            ),
                        ),
                        'deleteOwn' => array
                            (
                            'label' => '<i class="fa fa-times"></i>',
                            'imageUrl' => false,
                            'url' => 'Yii::app()->createUrl("//email_whitelist/admin/delete", array("id"=>$data->id));',
                            'deleteConfirmation' => false,
                            'options' => array(
                                'class' => 'btn btn-danger btn-xs tt',
                                'data-toggle' => 'tooltip',
                                'data-placement' => 'top',
                                'title' => '',
                                'data-original-title' => Yii::t('AdminModule.views_user_index', 'Delete user account'),
                            ),
                        ),
                    ),
                ),
            ),
            'pager' => array(
                'class' => 'CLinkPager',
                'maxButtonCount' => 5,
                'nextPageLabel' => '<i class="fa fa-step-forward"></i>',
                'prevPageLabel' => '<i class="fa fa-step-backward"></i>',
                'firstPageLabel' => '<i class="fa fa-fast-backward"></i>',
                'lastPageLabel' => '<i class="fa fa-fast-forward"></i>',
                'header' => '',
                'htmlOptions' => array('class' => 'pagination'),
            ),
            'pagerCssClass' => 'pagination-container',
        ));*/
        ?>

    </div>
</div>