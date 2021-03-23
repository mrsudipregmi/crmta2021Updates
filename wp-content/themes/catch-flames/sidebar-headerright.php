<?php
/**
 * The Sidebar containing the Header Right Widget Area
 *
 * @package Catch Themes
 * @subpackage Catch Flames
 * @since Catch Flames 1.0
 */
?>

<div id="sidebar-header-right" class="widget-area sidebar-top clearfix">

    <div id="supertopMenu">
        <ul>
            <li>
                <a class="st-link" href="#">Find an RMT</a>
            </li>
            <li>
                <a class="st-link" href="#">Insurer Login</a>
            </li>
            <li>
                <a class="st-link" href="#">Complaints</a>
            </li>
        </ul>
    </div>

	<aside class="widget widget_search">
        <?php echo get_search_form(); ?>
    </aside>

	<aside class="widget widget_catchflames_social_widget">
    	<?php catchflames_social_networks(); ?>
    </aside>
</div><!-- #sidebar-header-right -->