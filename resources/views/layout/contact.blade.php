<div class="contact-area bg-gray {{ $half ? 'half-bg' : '' }} default-padding">
    <div class="container">
        <div class="contact-box">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert"><strong>{{ __('admin/general.error') }} !</strong>
                        {{ $error }}</div>
                @endforeach
            @endif
            <div class="row align-center">
                <div class="col-lg-5 left-info">
                    <div class="item">
                        <div class="icon">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                        <div class="info">
                            <h5>{{ __('front/contact.address') }}</h5>
                            <p>
                                {{ config('setting.contact.address') }}
                            </p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="info">
                            <h5>{{ __('front/contact.phone') }}</h5>
                            <p>
                                {{ config('setting.contact.phone') }}
                            </p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="icon">
                            <i class="fas fa-envelope-open"></i>
                        </div>
                        <div class="info">
                            <h5>{{ __('front/contact.email') }}</h5>
                            <p>
                                {{ config('setting.contact.email') }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="content">
                        <div class="heading">
                            <h3>{{ __('front/contact.how_can_help') }}</h3>
                            <p>{{ __('front/contact.description') }}</p>
                        </div>
                        {{ Form::open(['route' => 'contact.send', 'method' => 'post']) }}
                        <div class="form-group">
                            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('front/contact.form.name_placeholder')]) }}
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => __('front/contact.form.email_placeholder')]) }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => __('front/contact.form.phone_placeholder')]) }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::text('subject', null, ['class' => 'form-control', 'placeholder' => __('front/contact.form.subject_placeholder')]) }}
                        </div>
                        <div class="form-group">
                            {{ Form::textarea('message', null, ['class' => 'form-control', 'placeholder' => __('front/contact.form.message_placeholder'), 'rows' => 3]) }}
                        </div>
                        <button type="submit">{{ __('front/contact.form.send') }}</button>
                        {{ Form::close() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
