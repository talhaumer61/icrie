<?php
	include("admin/dbsetting/classdbconection.php");
	include("admin/dbsetting/lms_vars_config.php");
	include("admin/functions/functions.php");
	include("admin/functions/login_func.php");

	$dblms = new dblms();

	include("include/header.php");
	switch (CONTROLER):
		case "index":
			case "home":
				case "":
					echo '
					<title>Home - '.ucwords(strtolower($rows4['setting_web_name'])).'</title>';
					include("include/index.php");
		break;
		case "about":
				include("include/about/about.php");
		break;
		case "contact":
				include("include/breadcrumb.php");
				include("include/contact/contact.php");
				include("include/contact/form.php");
		break;
		case "blogs":
			case "blog":
				include("include/breadcrumb.php");
				include("include/blog/blog.php");
		break;
		case "blogs-details":
			case "blog-detail":
				case "blogs-detail":
					case "blog-details":
						include("include/breadcrumb.php");
						include("include/blog/blog_detail.php");
		break;
		case "services":
			case "service":
				include("include/services/services.php");
		break;
		case "teams":
			case "team":
				include("include/breadcrumb.php");
				include("include/team/list.php");
		break;
		case "teams-details":
			case "team-detail":
				case "teams-detail":
					case "team-details":
						include("include/breadcrumb.php");
						include("include/team/team_deatail.php");
		break;
		case "testimonials":
			case "testimonial":
				echo '
				<title>Testimonials - '.ucwords(strtolower($rows4['setting_web_name'])).'</title>';
				include("include/testimonial.php");
		break;
		case "faq":
			echo '
			<title>Faq - '.ucwords(strtolower($rows4['setting_web_name'])).'</title>';
			include("include/breadcrumb.php");
			include("include/faq.php");
		break;
		case "functions":
			echo '
			<title>Functions - '.get_functiontypes(ZONE).' - '.ucwords(strtolower($rows4['setting_web_name'])).'</title>';
			include("include/breadcrumb.php");
			include("include/functions/functions.php");
		break;
		case "functions-details":
			case "functions-detail":
				case "function-detail":
					case "function-details":
						echo '
						<title>Functions - Details - '.ucwords(strtolower($rows4['setting_web_name'])).'</title>';
						include("include/breadcrumb.php");
						include("include/functions/functions_detail.php");
		break;
		case "admin":
			header("location: index.php");
		break;
		default:
			echo '
			<title>404 Not Found - '.ucwords(strtolower($rows4['setting_web_name'])).'</title>';
			include("include/404.php");
		break;
	endswitch;

	include("include/footer.php");
?>