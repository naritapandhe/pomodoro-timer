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
                <div class="row">
                    <div class="clock">

                    </div>
                </div>
                <div class="row" style="width:320px">
                     <div class="alert alert-block narrow">
                         <span id="alert-text">Start your pomodoros!!!</span>
                    </div>
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
                <div class="row-fluid" style="padding: 10px;">
                    <a href="#myModal" role="button" class="btn" data-toggle="modal"><i class="icon-cog"></i> Customize </a>
                    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="myModalLabel">Preferences</h3>
                        </div>
                        <form data-toggle="validator" role="form" id="configForm">
                            <div class="modal-body">
                                <div class="row-fluid">

                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th> Config </th>
                                            <th> Value </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <div class="form-group">
                                                <td>Pomodoro Duration (mins)</td>
                                                <td><input type="number" id="pomodoroDuration" data-error="Bruh, that's and invalid input." min="1" required value="25"></td>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="form-group">
                                                <td>Short Break Duration (mins)</td>
                                                <td><input type="number" id="shortBreakDuration" data-error="Bruh, that's and invalid input." min="0" required value="5"></td>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="form-group">
                                                <td>Long Break Duration (mins)</td>
                                                <td><input type="number" id="longBreakDuration" data-error="Bruh, that's and invalid input." min="0" required value="15"></td>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="form-group">
                                                <td>Total Pomodoro Rounds</td>
                                                <td><input type="number" id="totalRounds" data-error="Bruh, that's and invalid input." min="1" required value="4"></td>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="form-group">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>

                                    <button class="btn btn-primary" id="saveConfigChanges" type="submit">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
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
        <div class="span12">
            <h4>Pomodoro and Pomodori</h4>
            <p>
            The Pomodoro Technique uses a timer to break down work into intervals traditionally 25 minutes in length (pomodori), separated by short breaks. The method is based on the idea that frequent breaks can improve mental agility.</p>

            <h4>Acknowledgments</h4>
            <ul>
                <li><a href="https://pomodoro-tracker.com/" target="_blank">pomodoro-tracker.com</a></li>
                <li><a href="https://tomato-timer.com/" target="_blank">tomato-timer.com</a></li>
            </ul>
        </div>
    </div>

    <hr>

</div>

