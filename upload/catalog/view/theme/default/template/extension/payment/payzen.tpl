<?php
/**
 * PayZen V2-Payment Module version 3.0.0 for OpenCart 2.3.x. Support contact : support@payzen.eu.
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
 * @copyright 2014-2017 Lyra Network and contributors
 * @license   http://www.gnu.org/licenses/gpl.html  GNU General Public License (GPL v3)
 */
?>

<form action="<?php echo str_replace('&', '&amp;', $payzen_form_action); ?>" method="POST" id="<?php echo $payzen_form_id; ?>">
	<?php echo $payzen_form_fields; ?>

	<div class="buttons">
		<div class="pull-right">
			<input type="submit" value="<?php echo $button_confirm; ?>" class="btn btn-primary" />
		</div>
	</div>
</form>
