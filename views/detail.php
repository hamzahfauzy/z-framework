<?php foreach($users as $user): ?>
<h2>Detail <?= $user->username ?></h2>

Nama Lengkap : <?= $user->getUserMeta()->nama_lengkap ?> <br>
Alamat : <?= $user->getUserMeta()->alamat ?> <br>
Jenis Kelamin : <?= $user->getUserMeta()->jenis_kelamin ?> <br>

<br><br>
<h2>Post dengan <?= $user->username ?> sebagai author</h2>
<?php foreach ($user->getPosts() as $key => $value) : ?>
<h3><?= $value->post_title ?></h3>
<p><?= $value->post_content ?></p>
<br>
<?php endforeach ?>

<?php endforeach ?>
