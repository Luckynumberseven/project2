<?php get_header(); ?>
<?php
$args1 = array(
	'role' => 'student',
	'group' => 'FED15',
	'orderby' => 'user_nicename',
	'order' => 'ASC'
);
$students = get_users($args1);

echo '<ul>';
//echo do_shortcode('[groups_group_info group="FED15" show="users"]');
foreach ($students as $user) {
echo '<li>' . $user->display_name.'['.$user->user_email . ']</li>';
echo get_avatar($user->ID)."<br>";
echo "Elevens info:" . $user->the_author_description();
}
echo '</ul>';
?>
<?php get_footer(); ?>