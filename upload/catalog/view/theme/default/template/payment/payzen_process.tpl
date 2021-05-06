<?php
/**
 * Copyright © Lyra Network.
 * This file is part of PayZen plugin for OpenCart. See COPYING.md for license details.
 *
 * @author    Lyra Network (https://www.lyra.com/)
 * @copyright Lyra Network
 * @license   http://www.gnu.org/licenses/gpl.html GNU General Public License (GPL v3)
 */
?>

<?php echo $header; ?>
<div class="container">
    <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
            <li>
            <?php if (key_exists('href', $breadcrumb)) { ?>
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