<?= $this->Form->create($project, ['type' => 'file']) ?>
    <?= $this->Form->hidden('id') ?>

    <div class="well">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-6 projects form">
                <?php
                    echo $this->Form->input('title', ['class' => 'form-control']);
                    echo $this->Form->input('description');
                    echo $this->Form->input('brief_description', ['class' => 'form-control']);
                    echo $this->Form->input('website', ['class' => 'form-control']);
                    echo $this->Form->input('tags', [
                    	'class' => 'form-control taggable-select',
                    	'multiple' => true,
                    	'label' => 'Categories',
                    	'value' => $project->tags_array
                    ]);
                    echo $this->Form->input('technologies', ['class' => 'form-control']);
                    echo $this->Form->input('is_highlighted');
                    echo $this->Form->input('is_showcase');
                    echo $this->Form->input('project_images.file', [
                        'type' => 'file',
                        'label' => __d('Showcase', 'Image'),
                        'required' => false,
                        'id' => 'image-input'
                    ]);
                    echo $this->Form->error('image');
                ?>
                <div class="row">
                    <div class="col-sm-12 col-md-8 col-lg-6" id="image-preview">
                        <?php if (count($project->project_images)): ?>
                            <?= $this->Image->display($project->project_images[0], null, [
                                'style' => 'max-width:100%'
                            ]) ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success pull-right']) ?>
        </div>
    </div>
<?= $this->Form->end() ?>

<script type="text/javascript">
    document.getElementById('image-input').onchange = function (e) {
        var file = e.target.files[0],
            reader = new FileReader();

        if (file) {
            reader.readAsDataURL(file);
        }

        reader.onloadend = function () {
            var img = document.createElement('img');

            img.src = reader.result;
            img.style.maxWidth = "100%";

            img.onload = function () {
                var preview = document.getElementById('image-preview');
                preview.innerHTML = "";
                preview.appendChild(img);
            }
        }
    };

    CKEDITOR.replace('description');

    $(document).ready(function () {
    	$('.taggable-select').select2({tags:true});
    })
</script>
