<?php $__env->startSection('content'); ?>
<section class="s-space-bottom-full bg-accent-shadow-body">
    <div class="container">
        <div class="breadcrumbs-area">
            <ul>
                <li><a href="#">Home</a> -</li>
                <li class="active">Contact Page</li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="gradient-wrapper mb--sm">
                    <div class="gradient-title">
                        <h2>Contact With us</h2>
                    </div>
                    <div class="contact-layout1 gradient-padding">
                        <div class="google-map-area">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15870.749048536823!2d80.20424339647528!3d6.037582987634962!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae173bcaabaebbf%3A0xd1b262b2017f3b88!2sPeople&#39;s+Bank!5e0!3m2!1sen!2slk!4v1550746607145" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                        <p>If you did not find the answer to your question or problem, please get in touch with us using the form below and we will respond to your message as soon as possible.</p>
                        <form method="post" action="{{'/adminMessage'}}">
                            @csrf
                            <div>
                                <label for="">Name</label>
                                <input type="text" placeholder="Your Name" class="form-control" name="name" id="name" data-error="Name field is required" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="email">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Subject</label>
                                <input type="text" placeholder="Subject" class="form-control" name="subject" id="subject" data-error="Name field is required" required="">

                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="6" placeholder="Message"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="cp-default-btn-sm">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="sidebar-item-box">
                    <ul class="sidebar-more-option">
                        <li>
                            <a href="<?php echo e('/post_advertisement'); ?>"><img src="<?php echo e(asset('web/img/contact/more1.png')); ?>">Post a Free Ad</a>
                        </li>
                        <li>
                            <a class="login-btn"data-toggle="modal" data-target="#myModal"><img src="<?php echo e(asset('web/img/contact/more2.png')); ?>">Manage Product</a>
                        </li>



                    </ul>
                </div>
                <div class="sidebar-item-box">

                    <img src="<?php echo e(asset('web/img/contact/online_shopping_concept_male_and_various_goods_illustration_6826369.jpg')); ?>"alt="banner" class="img-fluid m-auto" id="shoppinImg">
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layouts.main_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>