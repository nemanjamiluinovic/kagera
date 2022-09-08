<?php if (!defined('ALLOW_ENTRY')) die('Access denied!'); ?>

<div id="add">
    <button class="button" onClick="window.open('?action=users-add-form');">
    <span class="icon">ADD NEW USER</span>
    </button>
</div>
<table id="sampleTable">
    <thead>
        <tr>
            <td>First name</td>
            <td>Last name</td>
            <td>position</td>
            <td>type</td>
            <td>details</td>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($users as $u) {
            $u->print_in_table();
        }
        ?>
    </tbody>
</table>
