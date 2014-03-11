<div class="welcome">
    <h2>Error selecting a database</h2>

    <p class="errorMessage"><?php echo $error; ?></p>
    
    <?php echo CHtml::link('Please, try again', array('setupconfig'), array('class' => 'btn btn-primary btn-lg btn-block')); ?>
</div>