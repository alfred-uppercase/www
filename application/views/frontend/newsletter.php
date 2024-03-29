<h5>Sign Up for Newsletter</h5>
<p>Signup to get updates on articles, interviews and events.</p>
  <div class="subscribe-form">
    <div id="messags" class="is-hidden h-text-center">
      <div class="success is-hidden alert-box alert-box--success">You have successfully subscribed to our newsletter</div>
      <div class="notnew is-hidden alert-box alert-box--info">You are already subscribed</div>
      <div class="fail is-hidden alert-box alert-box--error">Sorry, the newsletter subscription filed</div>
    </div>
    <form name="newsletter" method="post" action="{{base_url}}newsletter/subscribe" id="newsletterForm" class="group" novalidate>
      <input type="email" name="email" class="email" value="{{set_value('email') | striptags}}" data-rule-required="true" placeholder="Your Email Address"> 
      <input type="submit" name="subscribe" value="subscribe">
    </form>
</div>