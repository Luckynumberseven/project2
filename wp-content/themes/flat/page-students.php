<?php get_header(); ?>
<?php
$args1 = array(
	'role' => 'student',
	'orderby' => 'user_nicename',
	'order' => 'ASC'
);
$students = get_users($args1);

echo '<ul>';
foreach ($students as $user) {
echo '<li>' . $user->display_name.'['.$user->user_email . ']</li>';
echo get_avatar($user->ID);
echo do_shortcode('[groups_group_info group="FED15" show="users"]');
}
echo '</ul>';
?>
<?php get_footer(); ?>