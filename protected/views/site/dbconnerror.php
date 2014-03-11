<div class="welcome">
    <h2>Error establishing a database connection</h2>

    <p class="errorMessage"><?php echo $error; ?></p>
    
    <?php echo CHtml::link('Please, try again', array('setupconfig'), array('class' => 'btn btn-primary btn-lg btn-block')); ?>
</div>