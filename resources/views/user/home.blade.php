@extends('auth.layout.user')

@section('content')    
    <header class="bg-light text-dark py-5 text-center">
        <div class="custom-container container">
            <h1 class="mainHeader">Welcome to Our Online Store!</h1>
            <p class="lead">Discover the latest products at unbeatable prices. Shop with confidence and get the best deals today.</p>
            <a href="{{ route('shops.index') }}" class="btn btn-primary btn-lg">Shop Now</a>
        </div>

        <section id="about" class="py-5 bg-light">
            <div class="custom-container container">
                <h2 class="text-center">About Us</h2>
                <p class="text-center">At [My Company], we pride ourselves on being a leading online retailer dedicated to bringing you the best products at competitive prices. Founded with a passion for delivering exceptional value and customer satisfaction, our mission is to create a seamless shopping experience where quality and affordability meet. Our extensive catalog features a diverse range of products, from cutting-edge electronics and stylish apparel to everyday essentials and unique gifts. Each item is carefully curated to ensure it meets our high standards for quality, performance, and design. We partner with trusted brands and manufacturers to offer you the latest trends and innovations, all while maintaining our commitment to offering unbeatable prices. Customer satisfaction is at the heart of everything we do. Our team is dedicated to providing excellent service, whether you’re browsing our website, placing an order, or seeking assistance. We understand that shopping online should be a convenient and enjoyable experience, which is why we’ve designed our platform to be user-friendly and efficient. Our customer support team is always ready to help with any questions or concerns you may have, ensuring that your shopping experience is smooth from start to finish. We’re also committed to sustainability and ethical practices. We continuously seek ways to reduce our environmental impact and support ethical sourcing practices, striving to make a positive difference in the world. Our dedication to these values is reflected in our operations, from packaging to shipping, and we’re proud to offer products that align with these principles. At [Your Company Name], we’re more than just a retailer—we’re a community of like-minded individuals who share a passion for quality, value, and service. We’re excited to have you join us on this journey and look forward to serving you with the best products and experiences possible. Thank you for choosing [Your Company Name], where your satisfaction is our top priority.</p>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-5">
            <div class="custom-container container">
                <h2 class="text-center">Contact Us</h2>
                <p class="text-center">Have questions? Get in touch with us.</p>
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <form method="POST" action="#">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </header>
@endsection
