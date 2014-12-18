<h1><?=$title?></h1>

<table class="table-users">

<tr>
    <th><?='Id'?></th>
    <th><?='Akronym'?></th>
    <th><?='Namn'?></th>
    <th><?='Email'?></th>
</tr> 
<?php foreach ($users as $user) : ?>
<tr >
    <td><?=$user->id?></td>
    <td><a href="<?=$this->url->create('users/id/' . $user->id)?>"><?=$user->acronym?></a></td>
    <td><?=$user->name?></td>
    <td><?=$user->email?></td>
</tr> 
<?php endforeach; ?>
</table>
<a href="<?=$this->url->create('form/add-user') ?>"><i class="fa fa-plus-square"> Registrera ny användare </i></a>
<!--<p><a href="<?=$this->url->create('user/reset') ?>">Reset DB</a></p>-->
