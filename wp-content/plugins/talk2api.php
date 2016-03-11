<?php
/*
Plugin Name: Talk 2 API
Plugin URI: http://www.qlok.se
Description: The best plugin in the world!
Author: Lucky Number Seven
Version: 1.0
Author URI: http://www.qlok.se
*/

function talk2api_admin_page() {

	if($_POST['talk2api_course'] == TRUE){
		$course = filter_var( $_POST['course_id'], FILTER_SANITIZE_STRING );
		$endpoint = 'course/'.$course;
	}

	elseif($_POST['talk2api_student'] == TRUE){
		$student = filter_var( $_POST['student_id'], FILTER_SANITIZE_STRING );
		$endpoint = 'student/'.$student;
	}

	elseif($_POST['talk2api_get_grade'] == TRUE){

		if( !empty($_POST['student']) && !empty( $_POST['course_code'] ) ) {
			$student = filter_var($_POST['student'], FILTER_SANITIZE_STRING );
			$course = filter_var( $_POST['course_code'], FILTER_SANITIZE_STRING );
			$endpoint = "course/$course/grades/&student=$student";
		}

		elseif( empty( $_POST['student'] ) ) {
			$course = filter_var( $_POST['course_code'], FILTER_SANITIZE_STRING );
			$endpoint = 'course/'.$course.'/grades';
		}
	}

	elseif($_POST['talk2api_set_grade'] == TRUE){
		$data = ['student' => filter_var( $_POST['student'], FILTER_SANITIZE_STRING ),  'grade' => filter_var( $_POST['grade'], FILTER_SANITIZE_STRING )];
		$course = filter_var( $_POST['course_code'], FILTER_SANITIZE_STRING );
		$endpoint = 'course/'.$course.'/grades';
		$method_post = TRUE;
	}

	elseif($_POST['talk2api_update_grade'] == TRUE){
		$student = filter_var( $_POST['student'], FILTER_SANITIZE_STRING );
		$grade = filter_var( $_POST['new_grade'], FILTER_SANITIZE_STRING );
		$course = filter_var( $_POST['course_code'], FILTER_SANITIZE_STRING );
		$endpoint = "course/$course/grades&new_grade=$grade&student=$student";
		$method_put = TRUE;
	}

	if( isset( $_POST['all_courses'] ) ) {
		$endpoint = 'course';
	}
	if( isset( $_POST['all_students'] ) ) {
		$endpoint = 'student';
	}

	echo 
		'<div class="wrap">
			<h2>'.__('Talk 2 API command', 'talk2api_unique').'</h2>
			<hr>

			<form method="post" action="">
				<input type="text" name="course_id" placeholder="Course id...">
				<input type="submit" value="'.__("View Course", "talk2api").'">
				<input type="submit" name="all_courses" value="'.__("View All Courses", "talk2api").'">
				<input type="hidden" name="talk2api_course" value="true">
			</form>

			<form method="post" action="">
				<input type="text" name="student_id" placeholder="Student id...">
				<input type="submit" value="'.__("View Student", "talk2api").'">
				<input type="submit" name="all_students" value="'.__("View All Students", "talk2api").'">
				<input type="hidden" name="talk2api_student" value="true">
			</form>		

			<h2>'.__('Get Grades', 'talk2api_unique').'</h2>
			<p>Ange båda fält för en elevs betyg i en viss kurs eller ange endast kurskod för alla studenters betyg inom den kursen</p>
			<hr>	

			<form action="" method="post">
				<input type="text" name="student" placeholder="Student pnr...">
				<input type="text" name="course_code" placeholder="Kurs kod...">
				<input type="submit" value="'.__("Hämta Betyg", "talk2api").'">
				<input type="hidden" name="talk2api_get_grade" value="true">
			</form>

			<h2>'.__('Insert Grades', 'talk2api_unique').'</h2>
			<hr>

			<form action="" method="post">
				<input type="text" name="student" placeholder="Student pnr...">
				<input type="text" name="course_code" placeholder="Kurs kod...">
				<input type="text" name="grade" placeholder="Betyg...">
				<input type="submit" value="'.__("Lägg till Betyg", "talk2api").'">
				<input type="hidden" name="talk2api_set_grade" value="true">
			</form>

			<h2>'.__('Update Grades', 'talk2api_unique').'</h2>
			<hr>

			<form action="" method="post">
				<input type="text" name="student" placeholder="Student pnr...">
				<input type="text" name="course_code" placeholder="Kurs kod...">
				<input type="text" name="new_grade" placeholder="Nytt betyg...">
				<input type="submit" value="'.__("Uppdatera Betyg", "talk2api").'">
				<input type="hidden" name="talk2api_update_grade" value="true">
			</form>

			<h1>'.__('Talk 2 API Results', 'talk2api_unique').'</h1>
			<hr>
		';

	$curl = curl_init(); // Starts cUrl

	$url = "192.168.33.12/?$endpoint"; // Sets API URL

	curl_setopt($curl, CURLOPT_URL, $url); //Adds URL to cUrl
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // Sets cUrl responses to print string return values

	if( $method_post == TRUE ) {
		curl_setopt($curl, CURLOPT_POST, 1); // Sets request to POST. Also comes by default when passing a postfield
	}

	if( $method_put == TRUE ) {
		curl_setopt($curl, CURLOPT_PUT, 1); // Sets request to PUT
	}

	if( !empty($data)) {
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data)); // Sends the postfields along with our request. Forces request to POST.
	}

	$output = curl_exec($curl); // Holds cUrl response
	curl_close($curl); 
	echo $output;
	echo '</div>';
}

function talk2api_admin_menu(){
	 add_menu_page( 'Talk 2 API', 'Talk 2 API', 'manage_options', 'talk2api', 'talk2api_admin_page', '', '35'
    );
}

add_action('admin_menu', 'talk2api_admin_menu');