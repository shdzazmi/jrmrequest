<!-- Nama Field -->
<div class="form-group col-sm-6 p-0">
    <div class="form-group col-sm-12">
        <?php echo Form::label('Nama', 'Nama:'); ?>

        <?php echo Form::text('Nama', null, ['class' => 'form-control']); ?>

    </div>
</div>

<div class="form-group col-sm-6">
    <label for="cover_path">Gambar cover:</label>
    <div class="input-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="cover_path">
            <label class="custom-file-label" for="cover_path">Format .jpg .jpeg .png</label>
        </div>
    </div>
</div>

<div class="form-group col-sm-6">
    <label for=file_path">File:</label>
    <div class="input-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="file_path">
            <label class="custom-file-label" for="file_path">Format .pdf</label>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/file_catalogues/fields.blade.php ENDPATH**/ ?>