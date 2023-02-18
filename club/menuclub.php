<div class="main-menu">
	<div class="menu-left">	
		<ul>	
			<li>
				<a href="#">Report</a>
				<ul>
					<li><a href="taskreport.php">Task Report</a></li>
					<li><a href="volunteerreport.php">Volunteer Report</a></li>
				</ul>
			</li>

			<li>
				<a href="certificateclub.php">Certificate</a>
				<a href="forumclub.php">Forum</a>
				<a href="clubprofile.php">Club Profile</a>
				<a href="myevent.php">My Event</a>							
			</li>
			
			<div class="sidebar-item">
		    	<form action="search.php" method="POST">
		        	<input type="text" name="search" placeholder="Search Events">
		        	<button type="submit" name="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
		     	</form>
		    </div>
		</ul>
									
	</div>
								
	<div class="menu-right">
		<ul>								
		<br>
			<li><a href="../index.php" class="menu-button" onclick="return confirm('Are you sure you want to logout?')">Log Out</a></li>							
		</ul>
	</div>
</div>

