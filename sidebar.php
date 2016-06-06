
    <?php if (get_theme_mod( 'kotha_home_layout' ) == 'full') {
        
    } else { ?>
        <div class="col-md-4">
        <div class="uh-form-box">
        <h4>FIND THE PERFECT JOB FOR YOU</h4>
        <p>Search <strong>Many Job Boards</strong> at Once</p>
        	<form id="homeSearch" name="search", method="get" action="https://www.urbanhire.com/jobs" class="uh-form">
		<div>
			<input type="text" placeholder="Job title, keywords, or company name" name="q" class="input-job" id="filterJob">
		</div>
		<div>
			<input type="text" placeholder="Location", name="location" class="input-location" id="filterLocation">
		</div>
		<div>
			<button class="button-green" type="submit">SEARCH</button>
		</div>
	</form>
        </div>
            <div class="primary-sidebar widget-area" role="complementary">
                <?php dynamic_sidebar('blog-sidebar'); ?>
            </div>
        </div>
    <?php }
     ?>