        <?php

        $dir ='images';
        $file_display = array('jpg', 'jpeg', 'png', 'gif');
        if (file_exists($dir) == false) {
            echo 'Directory \''. $dir. '\' not found!';
        } else {
            $dir_contents = scandir($dir);

            foreach ($dir_contents as $file) {
                $file_type = strtolower(end(explode('.', $file)));

                if ($file !== '.' && $file !== '..' && in_array($file_type, $file_display) == true)
                {
                    $pics[] = '<img src="'. $dir. '/'. $file. '" alt="'. $file. '" />';
                }
            }
        }
        shuffle($pics);
        ?>
<div class="imgGallery col-lg-7">
                <div class="row">
                    <div class="col-xs-3">
                        <a href="#" class="thumbnail">
                            <?php echo $pics[0];?>
                        </a>
                    </div>
                    <div class="col-xs-3">
                        <a href="#" class="thumbnail">
                            <?php echo $pics[1];?>
                        </a>
                    </div>
                    <div class="col-xs-3">
                        <a href="#" class="thumbnail">
							<?php echo $pics[2];?>
                        </a>
                    </div>
                    <div class="col-xs-3">
                        <a href="#" class="thumbnail">
                            <?php echo $pics[3];?>
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-3">
                        <a href="#" class="thumbnail">
                            <?php echo $pics[4];?>
                        </a>
                    </div>
                    <div class="col-xs-3">
                        <a href="#" class="thumbnail">
                            <?php echo $pics[5];?>
                        </a>
                    </div>
                    <div class="col-xs-3">
                        <a href="#" class="thumbnail">
                            <?php echo $pics[6];?>
                        </a>
                    </div>
                    <div class="col-xs-3">
                        <a href="#" class="thumbnail">
                            <?php echo $pics[7];?>
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-3">
                        <a href="#" class="thumbnail">
                            <?php echo $pics[8];?>
                        </a>
                    </div>
                    <div class="col-xs-3">
                        <a href="#" class="thumbnail">
                            <?php echo $pics[9];?>
                        </a>
                    </div>
                    <div class="col-xs-3">
                        <a href="#" class="thumbnail">
                            <?php echo $pics[10];?>
                        </a>
                    </div>
                    <div class="col-xs-3">
                        <a href="#" class="thumbnail">
                            <?php echo $pics[11];?>
                        </a>
                    </div>
                </div>


                <ul class="pagination pull-right">
                    <li><a href="#">Prev</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">Next</a></li>
                </ul>
            </div>
        </main>