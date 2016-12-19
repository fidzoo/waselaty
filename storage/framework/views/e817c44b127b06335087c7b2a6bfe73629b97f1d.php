<?php echo Form::open(["url"=>"comments/$job->id"]); ?>

                    <input type="text" name="title" placeholder="عنوان التعليق">
                    <textarea name="comment" id="comment" placeholder="أضف تعليقك هنا"></textarea>
                    <button value="submit" id="">إرسل تعليقك</button>
                    <?php echo Form::close(); ?>