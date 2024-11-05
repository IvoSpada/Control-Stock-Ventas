<?php foreach ($usuarios as $usuario): ?>
    <!-- <button class="user btn-limitar-texto" type="submit" name="user_role" value=""> -->
    <button 
        class="user ov-btn-slide-top" 
        type="submit" 
        name="user_role" 
        value="<?php echo $usuario->id; ?>"
        ><?php echo $usuario->nombre; ?></button>
<?php endforeach; ?>

