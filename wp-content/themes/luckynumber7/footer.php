					<footer>
						<div class="row">
							<div class="col-xs-12 page-content">
								<div class="row">
									<div class="col-xs-12">
									<?php

									if ( is_active_sidebar('sidebar-2') ) {
										dynamic_sidebar('sidebar-2');
									}
									?>
									</div>
								</div>
							</div>
							<div class="col-xs-12 page-content">
								<div class="row">
									<div class="col-xs-12">
									<?php

									if ( is_active_sidebar('sidebar-3') ) {
										dynamic_sidebar('sidebar-3');
									}
									?>
									</div>
								</div>

							</div>
						</div>
					</footer>
				</div><!--main-col-->
			</div><!--main-row-->
		</div> <!--container-fluid-->

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<?php wp_footer() ?>
	</body>
</html>