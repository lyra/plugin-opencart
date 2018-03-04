<?php
/**
 * PayZen V2-Payment Module version 2.1.0 for OpenCart 2.0-2.2. Support contact : support@payzen.eu.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @category  payment
 * @package   payzen
 * @author    Lyra Network (http://www.lyra-network.com/)
 * @copyright 2014-2016 Lyra Network and contributors
 * @license   http://www.gnu.org/licenses/gpl.html  GNU General Public License (GPL v3)
 * @version   2.1.0 (revision 67770)
*/ 
?>

<?php echo $header; ?>
<div class="container">
	<ul class="breadcrumb">
		<?php foreach ($breadcrumbs as $breadcrumb) { ?>
			<li>
			<?php if(key_exists('href', $breadcrumb)) { ?>
				<a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
			<?php } else { ?>
				<span style="color: #23a1d1;"><?php echo $breadcrumb['text']; ?></span>
			<?php } ?>
			</li>
		<?php } ?>
	</ul>

	<div class="row">
		<?php echo $column_left; ?>

		<?php if ($column_left && $column_right) {
			$class = 'col-sm-6';
		} elseif ($column_left || $column_right) {
			$class = 'col-sm-9';
		} else {
			$class = 'col-sm-12';
		} ?>

		<div id="content" class="<?php echo $class; ?>">
			<h1><?php echo $heading_title; ?></h1>

			<?php if (isset($text_payzen_pass_to_prod)) { ?>
			<div class="alert alert-success"><?php echo $text_payzen_pass_to_prod; ?></div><br ∕>
			<?php } ?>

			<?php if (isset($text_payzen_url_check)) { ?>
			<div class="alert alert-warning"><?php echo $text_payzen_url_check; ?></div><br />
			<?php }?>

			<?php echo $text_message; ?>

			<?php foreach ($payzen_data as $key => $value) { ?>
			<p><b><?php echo $key; ?> : </b><?php echo $value; ?></p>
			<?php } ?>

			<div class="buttons">
				<div class="pull-right"><a href="<?php echo $continue; ?>" class="btn btn-primary"><?php echo $button_continue; ?></a></div>
			</div>

			<?php echo $content_bottom; ?>
		</div>

		<?php echo $column_right; ?>
	</div>
</div>

<?php echo $footer; ?>