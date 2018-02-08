<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
	<!DOCTYPE html>
	<html lang="<?= Yii::$app->language ?>">
	<head>
		<meta charset="<?= Yii::$app->charset ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/css/bootstrap.css" rel="stylesheet" media="screen">
        <link href="/css/flipclock.css" rel="stylesheet">
        <style type="text/css">
            body {
                padding-top: 20px;
                padding-bottom: 40px;
            }

            /* Custom container */
            .container-narrow {
                margin: 0 auto;
                max-width: 1000px;
            }
            .container-narrow > hr {
                margin: 10px 0;
            }

            /* Main marketing message and sign up button */
            .jumbotron {
                margin: 20px 0;
                text-align: center;
            }
            .jumbotron h1 {
                font-size: 72px;
                line-height: 1;
            }
            .jumbotron .btn {
                font-size: 18px;
                padding: 14px 24px;
            }
            .alert {
                padding: 5px;
            }

            /* Supporting marketing content */
            .marketing {
                margin: 10px 0;
            }
            .marketing p + h4 {
                margin-top: 28px;
            }
        </style>
        <link href="/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
        <?= Html::csrfMetaTags() ?>
		<title><?= Html::encode($this->title) ?></title>
		<?php $this->head() ?>
	</head>
	<body>
	<?php $this->beginBody() ?>

	<div class="wrap">
        <div class="container-narrow masthead">
            <!-- <ul class="nav nav-pills pull-right">
                <li><a href="/site/timer"><h5 class="muted">Home</h5></a></li>
                <li><a href="/site/about"><h5 class="muted">About</h5></a></li>
                <li><a href='/site/login'><h5 class="muted">Login</h5></a></li>
                <!--<li><a href="#">Contact</a></li>
            </ul> -->
            <h2>Pomodoro Timer</h2>
        </div>

        <?php
		/*NavBar::begin([
			'brandLabel' => Yii::$app->name,
			'brandUrl' => Yii::$app->homeUrl,
			'options' => [
				'class' => 'navbar-inverse navbar-fixed-top',
			],
		]);
		echo Nav::widget([
			'options' => ['class' => 'navbar-nav navbar-right'],
			'items' => [
				['label' => 'Home', 'url' => ['/site/index']],
				['label' => 'Timer', 'url' => ['/site/timer']],
				['label' => 'About', 'url' => ['/site/about']],
				['label' => 'Contact', 'url' => ['/site/contact']],
				Yii::$app->user->isGuest ? (
				['label' => 'Login', 'url' => ['/site/login']]
				) : (
					'<li>'
					. Html::beginForm(['/site/logout'], 'post')
					. Html::submitButton(
						'Logout (' . Yii::$app->user->identity->username . ')',
						['class' => 'btn btn-link logout']
					)
					. Html::endForm()
					. '</li>'
				)
			],
		]);
		NavBar::end();*/
		?>

		<div class="container">

			<?= Alert::widget() ?>
			<?= $content ?>
		</div>
	</div>

	<footer class="footer">
		<div class="container container-narrow ">
			<p class="pull-left">&copy; <?= date('Y') ?></p>

			<p class="pull-right"><?= Yii::powered() ?></p>
		</div>
	</footer>

	<?php $this->endBody() ?>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/flipclock.min.js"></script>
    <script src="/js/ion.sound.min.js"></script>
    <script src="/js/js.cookie.js"></script>
    <script src="http://1000hz.github.io/bootstrap-validator/dist/validator.min.js"></script>


    <script type="text/javascript">

        $(document).ready(function () {
            /*
            * Initializations start.
            */
            /*
            Setting the cookie options
             */
            Cookies.json = true;

            /*
            JS Config for notification sounds
             */
            ion.sound({
                sounds: [
                    {
                        name: "bell_ring",
                        volume: 0.2,
                        preload: false
                    }
                ],
                volume: 0.2,
                path: "/sounds/",
                preload: true
            });

            /*
		   Other variables required for managing the timers
			*/
            var currentPomodoroRounds;
            var shortDurationEnabled;
            var longDurationEnabled;
            var started;
            function initializePomodoro(){
                currentPomodoroRounds = 0;
                shortDurationEnabled = 0;
                longDurationEnabled = 0;
                started = false;

            }
            initializePomodoro()

            /*
			* Helper functions.
			*/
            function startShortDuration(){
                ion.sound.play("bell_ring");
                shortDurationEnabled=1;
                console.log('shortDurationEnabled started...');
                started = true;
                clockObj.setTime(defaultTimeVariables.shortBreakDuration);
                $('#alert-text').html('Short Break :)');
                clockObj.start();
            }

            function startLongDuration(){
                ion.sound.play("bell_ring");
                longDurationEnabled=1;
                console.log('longDurationEnabled started...');
                started = true;
                clockObj.setTime(defaultTimeVariables.longBreakDuration);
                $('#alert-text').html('Long Break ;)');
                clockObj.start();
            }

            function stopShortDuration(){
                shortDurationEnabled = 0;
                started = true;
                console.log('shortDurationEnabled finished...normal round started...');
                $('#alert-text').html('Pomodoro Round: #'+(currentPomodoroRounds+1));
                clockObj.setTime(defaultTimeVariables.pomoroDuration);
                clockObj.start();
            }

            function stopLongDuration(){
                console.log('long break finished. normal round started......');
                initializePomodoro()
                started = true;
                clockObj.setTime(defaultTimeVariables.pomoroDuration);
                $('#alert-text').html('Pomodoro: #'+(currentPomodoroRounds+1));
                clockObj.start();

            }

            /*
			* Initializations end.
			*/


            /*
            Check if Pomodoro timer was used before.
                - If yes, pull up same config
                - If not, create an object with some default values.
             */
            var cookieVal = Cookies.get("defaultTimeVariables")
            if (typeof cookieVal === "undefined"){
                var defaultTimeVariables = new Object();
                defaultTimeVariables.pomoroDuration = 20;
                defaultTimeVariables.shortBreakDuration = 5;
                defaultTimeVariables.longBreakDuration = 10;
                defaultTimeVariables.rounds = 4;

                //Set the expiry of timer for 1 day
                Cookies.set("defaultTimeVariables", JSON.stringify(defaultTimeVariables), {expires: 1});
            }else{
                var defaultTimeVariables = cookieVal;
            }



            /*
            Timer/Counter object which handles all the start
            and stop events.
             */
            $('#stopTimer').attr('disabled',true);
            var clockObj = $('.clock').FlipClock(defaultTimeVariables.pomoroDuration,{
                autoStart: false,
                countdown: true,
                clockFace: 'MinuteCounter',
                callbacks: {
                    stop: function() {

                        t = clockObj.getTime();
                        if(t<=0 && started){
                            started = false

                            if (shortDurationEnabled == 0 && longDurationEnabled == 0){
                                currentPomodoroRounds = currentPomodoroRounds+1;
                                if (currentPomodoroRounds < defaultTimeVariables.rounds){
                                    startShortDuration();
                                }else{
                                    startLongDuration();
                                }

                            }else if (shortDurationEnabled == 1){
                                stopShortDuration();

                            }else if (longDurationEnabled == 1){
                                stopLongDuration();
                            }
                        }
                    },
                }
            });


            /*
            Start timer triggers the counter.
             */

            $('#startTimer').click(function () {
                clockObj.setTime(defaultTimeVariables.pomoroDuration);
                started = true;
                $('#alert-text').html('Pomodoro: #'+(currentPomodoroRounds+1));
                clockObj.start();
                $('#stopTimer').attr('disabled',false);
                $('#startTimer').attr('disabled',true);
            });

            /*
            Stop timer stops the counter.
             */
            $('#stopTimer').click(function () {
                clockObj.stop();
                $('#alert-text').html('Start your pomodoros!!!');
                clockObj.reset()
                $('#startTimer').attr('disabled',false);
                $('#stopTimer').attr('disabled',true);
                initializePomodoro();
                clockObj.setTime(defaultTimeVariables.pomoroDuration);
            });

            /*
            Below method updates the default config values for counter.
             */
            $('#configForm').validator().on('submit', function (e) {
                e.preventDefault();
                $('#myModal').modal('hide');
                pomodoroDuration = parseInt($('#pomodoroDuration').val());
                shortBreakDuration = parseInt($('#shortBreakDuration').val());
                longBreakDuration = parseInt($('#longBreakDuration').val());
                totalRounds = parseInt($('#totalRounds').val());

                if (
                    (pomodoroDuration != null && pomodoroDuration > 0) &&
                    (shortBreakDuration != null && shortBreakDuration >= 0) &&
                    (longBreakDuration != null && longBreakDuration >= 0) &&
                    (totalRounds != null && totalRounds >= 1)){
                        defaultTimeVariables.pomoroDuration = pomodoroDuration * 60;
                        defaultTimeVariables.shortBreakDuration = shortBreakDuration * 60;
                        defaultTimeVariables.longBreakDuration = longBreakDuration * 60;
                        defaultTimeVariables.rounds = totalRounds;
                        Cookies.set("defaultTimeVariables", JSON.stringify(defaultTimeVariables),{expires:1});
                }
            })


        })

    </script>

    </body>
	</html>
<?php $this->endPage() ?>