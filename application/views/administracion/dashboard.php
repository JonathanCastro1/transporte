<br>
<br>
<br>
<p class="bg-success">
<?php if($this->session->userdata('usuario')): ?>

<?php echo "Bienvenido Usuario: " . $this->session->userdata('usuario'); ?>

<?php endif; ?>
</p>

<h1>dashboard Administracion</h1>