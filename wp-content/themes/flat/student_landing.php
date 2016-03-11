<?php
$user_id = get_current_user_id();

global $current_user;
get_currentuserinfo();
 //Get user group info, store group names in array
$groups_user = new Groups_User( get_current_user_id() );
$user_groups = $groups_user->groups;

	foreach ($user_groups as $group ) {
		$groups_name[] = $group->name;
	}?>

	<h1 class="page-title" itemprop="name"> Välkommen <?php echo $current_user->display_name ?></h1>

	<?php flat_hook_entry_before(); ?>
	<div class="entry-content" itemprop="articleBody">

			<?php flat_hook_entry_top(); ?>
			<header class="entry-header hentry">
				<h2 class="entry-title" itemprop="name"> <?php echo $group->name; ?> </h2>
			</header>
			<div class="author-info bio">
				<div class="author-avatar floatleft">
					<?php get_avatar(esc_html($user_id)); ?>
				</div>
				<div class="floatleft margin-left-10">
					<h5><?php echo $current_user->user_firstname," ", $current_user->user_lastname; ?></h5>
					<?php echo $current_user->user_email; ?><br>
					<?php echo $current_user->phone; ?>
				</div>
				<div class="author-description clear">
					<p class="about">
						<h4><?php printf( __( 'Om %s', 'flat' ), $current_user->display_name ); ?></h4>
						<p><?php echo $current_user->description; ?></p>
					
						<form method="post" action="<?php echo home_url('/edit-user')?>">
							<input type="submit" class="button" value="Ändra dina uppgifter" />
						</form>
					</p>
				</div>
			</div>
			<div class="bio">
				<h2>Senaste inlägg från din lärare:</h2>
				<?php if ( have_posts() ) : ?> <!-- the loop -->
					<?php while ( have_posts() ) : the_post(); ?>
						
						<?php //Get post categories, compare to user groups, print accordingly
						$categories = get_the_category();
						foreach($categories as $category) {
							if ( in_array( $category->name, $groups_name ) ) {?>
							<h3><a href="<?php the_permalink()?>"><?php the_title()?></a></h3>
							<?php }
							}?>
					<?php endwhile; ?>
				<?php endif ?>
			</div>
		<?php flat_hook_entry_bottom(); ?>
	</div>
<?php flat_hook_entry_after(); ?>




