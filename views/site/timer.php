<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Pomodoro Timer';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-narrow">


    <hr>
    <div class="jumbotron hero-unit" style="background-color: #e27677">
        <div class="row">
            <div class="span1">
            </div>
            <div class="span4">
                <div class="clock">

                </div>
            </div>
            <div class="span4">
                <div class="row-fluid" style="padding: 10px;">
                    <button type="button" class="btn btn-large" id="startTimer"><i class="icon-play"></i> Start Timer </button>
                </div>
                <div class="row"></div>
                <div class="row-fluid" style="padding: 10px;">
                    <button type="button" class="btn btn-large" id="stopTimer"><i class="icon-stop"></i> Stop Timer </button>
                </div>
            </div>
            <div class="span1">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">

            </div>
            <div class="col-md-6">

            </div>
        </div>
    </div>

    <hr>

    <div class="row-fluid marketing">
        <div class="span6">
            <h4>Subheading</h4>
            <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

            <!--<h4>Subheading</h4>
            <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>-->

            <!--<h4>Subheading</h4>
            <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>-->
        </div>

        <div class="span6">
            <h4>Subheading</h4>
            <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

            <!--<h4>Subheading</h4>
            <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>-->

            <!--<h4>Subheading</h4>
            <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>-->
        </div>
    </div>

    <hr>

</div>

