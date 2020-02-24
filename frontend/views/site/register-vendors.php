<?php
    /* @var $this yii\web\View */
    $this->title = 'Careers';
?>
<div class="page-header">
    <div class="container">
        <h1 class="title">Register Your Vehical</h1>
    </div>

</div>
<!-- page-header -->
<section id="page-content" class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-7">
                <div class="row">
                    <div class="col-sm-6 col-md-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                    <div class="col-sm-6 col-md-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                </div>
                <hr />
                <div class="panel-group list-style" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Requirements</a>
                            </div>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <p>Ultrices metus et dui dictum quis elementum augue imperdiet. Nunc a turpis nec elit porttitor varius. Cras non felis eget nibh eleifend rhoncus id sit amet nisi. Cras est mi, dapibus eu dictum quis, interdum in dui. Ut lacinia accumsan libero ac semper. Sed in turpis in massa mattis blandit eget vel sem. Nullam id erat sapien, ac faucibus est. Ut eu tortor rutrum erat pellentesque iaculis. Nunc porta convallis pharetra.</p>
                                <ol>
                                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                    <li>Mauris dictum tempor magna, sit amet venenatis elit sodales sagittis.</li>
                                    <li>Pellentesque rhoncus arcu sed nisl vulputate ultrices.</li>
                                    <li>In eget dolor nec tortor tempor blandit.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default panel-bg graphic-design">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">What we Expect from you?</a>
                            </div>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Ultrices metus et dui dictum quis elementum augue imperdiet. Nunc a turpis nec elit porttitor varius. Cras non felis eget nibh eleifend rhoncus id sit amet nisi. Cras est mi, dapibus eu dictum quis, interdum in dui. Ut lacinia accumsan libero ac semper. Sed in turpis in massa mattis blandit eget vel sem. Nullam id erat sapien, ac faucibus est. Ut eu tortor rutrum erat pellentesque iaculis. Nunc porta convallis pharetra.</p>
                                <ol>
                                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                    <li>Mauris dictum tempor magna, sit amet venenatis elit sodales sagittis.</li>
                                    <li>Pellentesque rhoncus arcu sed nisl vulputate ultrices.</li>
                                    <li>In eget dolor nec tortor tempor blandit.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default panel-bg web-design">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">What you&#39;ve got?</a>
                            </div>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Ultrices metus et dui dictum quis elementum augue imperdiet. Nunc a turpis nec elit porttitor varius. Cras non felis eget nibh eleifend rhoncus id sit amet nisi. Cras est mi, dapibus eu dictum quis, interdum in dui. Ut lacinia accumsan libero ac semper. Sed in turpis in massa mattis blandit eget vel sem. Nullam id erat sapien, ac faucibus est. Ut eu tortor rutrum erat pellentesque iaculis. Nunc porta convallis pharetra.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default panel-bg ecommerce">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Other Informations</a>
                            </div>
                        </div>
                        <div id="collapse4" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Ultrices metus et dui dictum quis elementum augue imperdiet. Nunc a turpis nec elit porttitor varius. Cras non felis eget nibh eleifend rhoncus id sit amet nisi. Cras est mi, dapibus eu dictum quis, interdum in dui. Ut lacinia accumsan libero ac semper. Sed in turpis in massa mattis blandit eget vel sem. Nullam id erat sapien, ac faucibus est. Ut eu tortor rutrum erat pellentesque iaculis. Nunc porta convallis pharetra.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <p>
                    <a href="#" class="btn btn-default">Apply Now</a>
                </p>
            </div>
            <div class="col-sm-12 col-md-5">
                <div class="career-form">
                    <form role="form" class="form-box" name="careerform"  id="careerform"  method="post"  enctype='multipart/form-data'>
                        <h3 class="title">Apply Now</h3>
                        <p id="form-message2" class="form-message2"></p>
                        <div class="input-text form-group">
                            <input class="input-name form-control" type="text" id="career_name" name="career_name" placeholder="Name" />
                        </div>
                        <div class="input-email form-group">
                            <input type="email" id="femail" name="femail" class="form-input input-email form-control" placeholder='From E-Mail'/>
                        </div>
                        <div class="row" role="form">
                            <div class="col-md-6">
                                <label class="sr-only">Age</label>
                                <input type="text" name="career_age" class="form-control" placeholder="Age" />
                            </div>
                            <div class="col-md-6">
                                <label class="sr-only">City</label>
                                <input type="text" name="career_city" class="form-control" placeholder="City" />
                            </div>
                        </div>
                        <div class="input-phone form-group">
                            <label class="sr-only">Phone</label>
                            <input class="input-phone form-control" type="text" id="career_phone" name="career_phone" placeholder="Phone" />
                        </div>
                        <div class="row" role="form">
                            <div class="col-md-6">
                                <label class="sr-only">Salary</label>
                                <input type="text" class="form-control" name="career_salary" placeholder="Expected Salary" />
                            </div>
                            <div class="col-md-6">
                                <label class="sr-only">Experience</label>
                                <input type="text" class="form-control" name="career_experience" placeholder="Experience" />
                            </div>
                        </div>
                        <div>
                            <label class="sr-only">Website</label>
                            <input class="form-control" type="text" name="career_website" placeholder="Website" />
                        </div>
                        <div>
                            <label class="sr-only">Comment</label>
                            <textarea class="form-control" id="career_comment" name="career_comment" placeholder="Other Details"></textarea>
                        </div>
                        <div class="input-file form-group">
                            <input type="file" id="careerfile" name="careerfile" class="input-file" />
                        </div>
                        <div class="clearfix"></div>
                        <button type="submit" class="btn btn-default" >Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
