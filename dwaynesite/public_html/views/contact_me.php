<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Me</title>
    <link rel="stylesheet" href="/assets/css/style.css">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=6Lf5DgEVAAAAAAFVzjdmsdIe1yRIiBrsx9ZzBspa"></script>
</head>

<body>
<?= \Nano\ViewHelper::getPartialContent("nav") ?>

<main class="content" role="main">

    <?= \Nano\ViewHelper::getPartialContent("hero") ?>

    <section>
        <div class="container">
            <div class="contact-form">
                <picture class="contact-form__img-wrapper">
                    <source srcset=""
                            media="(min-width: 768px)">
                    <img class="contact-form__img" src="/assets/img/map.jpg" alt="Office Map">
                </picture>
                <div class="contact-form__content-wrapper">
                    <div class="contact-form__content">
                        <span class="info-snippet__bg-text">05</span>
                        <h3 class="contact-form__title">You can also find me in the office</h3>
                        <p class="contact-form__text">I aim to respond as quickly as possible, and if you need any help, why not arrange a day during the week for you to pop in and meet the rest of the JH team?</p>
                    </div>

                    <form id="contactForm" action="/form/contact" method="post" class="contact-form__form">
                        <fieldset>
                            <div id="field-name-field" class="contact-form__name-field">
                                <label for="name-field" class="contact-form__label">What is your name?</label>
                            </div>
                            <div class="contact-form__control">
                                <input name="name" type="text" class="contact-form__input" id="name-field" placeholder="Your name">
                            </div>
                            <div id="field-email-field" class="contact-form__name-field">
                                <label for="email-field" class="contact-form__label">What is your email?</label>
                            </div>
                            <div class="contact-form__control">
                                <input name="email" type="email" class="contact-form__input" id="email-field" placeholder="Your email">
                            </div>
                            <div id="field-textarea" class="contact-form__textarea">
                                <label for="textarea" class="contact-form__label">How can I help?</label>
                            </div>
                            <div class="contact-form__control">
                    <textarea
                            name="message"
                            class="contact-form__textarea-input"
                            id="textarea"
                            placeholder="Your message"
                    ></textarea>
                            </div>
                            <button>
                    <span class="hero__button-content">
                        <span class="hero__button-text">Send message</span>
                        <svg class="hero__button-arrow" width="18" height="14"
                             xmlns="http://www.w3.org/2000/svg">
                            <g transform="rotate(90 8 9)" fill="none">
                                <rect fill="#FFF" x="5" y="1" width="2" height="16" rx="1"/>
                                <path stroke="#FFF"
                                      stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M12 6L6 0 0 6"/></g></svg>
                    </span>
                            </button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?= \Nano\ViewHelper::getPartialContent("latest_posts") ?>

</main>

<?= \Nano\ViewHelper::getPartialContent("footer") ?>

<script>
    function sendFormData(action, method, formData, callback){
        $.ajax({
            url:action,
            type: method,
            data: formData,
            success: callback,
            dataType: "json",
            contentType: false,
            processData:false
        });
    }

    $('#contactForm').submit(function(ev) {
        ev.preventDefault();
        let form = this;
        let fData = new FormData(form);

        grecaptcha.ready(function() {
            grecaptcha.execute('6Lf5DgEVAAAAAAFVzjdmsdIe1yRIiBrsx9ZzBspa', {action: 'send_message'}).then(function(token) {
                fData.append("token", token);
                fData.append("action", "send_message");
                sendFormData(form.getAttribute("action"), form.getAttribute("method"), fData, data => {

                    // TODO handle the response in UI

                    if (data.Success === true){
                        alert(data.Message)
                    }
                    else{
                        alert('Unable to send message');
                        throw new Error(data.Message);
                    }

                });
            });
        });
    });
</script>
</body>

</html>