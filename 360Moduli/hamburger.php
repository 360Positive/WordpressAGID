<style>
.wrapper {
	display: fixed;
	align-items: stretch;
	position: fixed;
	z-index: 100;
	background: red;
}

#sidebar {
	min-width: 250px;
	max-width: 250px;
	height: 100%;
	padding: 2%;
}

#sidebar>img {
	width: 80%;
}

#sidebar.active {
	margin-left: -250px;
}

a[data-toggle="collapse"] {
	position: relative;
}

.dropdown-toggle::after {
	display: block;
	position: absolute;
	top: 50%;
	right: 20px;
	transform: translateY(-50%);
}

@media ( max-width : 768px) {
	#sidebar {
		margin-left: -250px;
	}
	#sidebar.active {
		margin-left: 0;
	}
}

li.divider {
	display: none;
}
</style>

<?php
$menuitem = wp_get_nav_menu_items('Menu 1');

// print_r($menuitem);
function createMenu($menitem)
{
    foreach ($menitem as $item) {
        // print_r($item);
        // echo $item->post_title;

        ?>
<a href="#<?= str_replace(' ','',$item->post_title) ?>"
	data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><?= $item->post_title?></a>
<ul class="collapse list-unstyled"
	id="<?= str_replace(' ','',$item->post_title) ?>">
			
			<?php

if ($item->classes != null) {
            $sub = $item->classes;
            foreach ($sub as $subitem) {
                echo '<li>';
                echo '<a href="#">' . $subitem->post_title . '</a>';
                echo '</li>';
            }
        }
        ?>
		</ul>

<?php
    }
}

?>


<!-- Sidebar -->
<nav id="sidebar" class="wrapper collapse">
	<div class="sidebar-header">

		<h1>
			<i id="menuCollapse" class="icofont-ui-close"></i>
		</h1>
	</div>
	<?php
$path = "http://comune.acquiterme.al.it/sviluppo/wp-content/uploads/2019/08/logo-acqui-terme.png";
echo '<img src="' . $path . '" alt="' . esc_html(get_bloginfo('name')) . '">';
?>
	<h2>Menu</h2>
	
	<?php
$defaults = array(
    'menu' => '81',
    'container' => 'div',
    'menu_class' => 'nav navbar-nav main-nav'
);

wp_nav_menu($defaults);
?>
	<script>
		$('ul.sub-menu').children('a').click(function(){
			$(this).children('.sub-menu').slideToggle('slow');
			}).children('ul').find('a').click(function (event) {
			event.stopPropagation();
			console.log('hello!');
			return false;
		});
		
		
		
	</script>

	<ul class="list-unstyled components">
		<li class="active"><a href="#homeSubmenu" data-toggle="collapse"
			aria-expanded="false" class="dropdown-toggle">Home</a>
			<ul class="collapse list-unstyled" id="homeSubmenu">
				<li><a href="#">Home 1</a></li>
				<li><a href="#">Home 2</a></li>
				<li><a href="#homeSubmenu" data-toggle="collapse"
					aria-expanded="false" class="dropdown-toggle">Home</a>
					<ul class="collapse list-unstyled" id="homeSubmenu">
						<li><a href="#">Home 1</a></li>
						<li><a href="#">Home 2</a></li>
						<li><a href="#">Home 3</a></li>
					</ul></li>
			</ul></li>
		<li><a href="#">About</a></li>
		<li><a href="#pageSubmenu" data-toggle="collapse"
			aria-expanded="false" class="dropdown-toggle">Pages</a>
			<ul class="collapse list-unstyled" id="pageSubmenu">
				<li><a href="#">Page 1</a></li>
				<li><a href="#">Page 2</a></li>
				<li><a href="#">Page 3</a></li>
			</ul></li>
		<li><a href="#">Portfolio</a></li>
		<li><a href="#">Contact</a></li>
	</ul>
</nav>

<script>
    $(document).ready(function () {
        
		$('#sidebarCollapse').on('click', function () {
			$('#sidebar').toggleClass('active');
		});
		$('#menuCollapse').on('click', function () {
			$('#sidebar').toggleClass('active');
		});
		
	});
	
	
	
</script>