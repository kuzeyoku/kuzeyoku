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
                            <h5>Ofis Adresimiz</h5>
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
                            <h5>Phone</h5>
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
                            <h5>Email</h5>
                            <p>
                                {{ config('setting.contact.email') }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="content">
                        <div class="heading">
                            <h3>Nasıl Yardımcı Olabiliriz ?</h3>
                            <p>Hizmet ve fiyatlarımız hakkında bilgi almak, soru, görüş ve önerileriniz için mesaj
                                gönderebilirsiniz.</p>
                        </div>
                        {{ Form::open(['route' => 'contact.send', 'method' => 'post']) }}
                        <div class="form-group">
                            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Adınızı ve Soyadınızı Girin']) }}
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'E-Posta Adresinizi Girin']) }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Telefon Numaranızı Girin']) }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::text('subject', null, ['class' => 'form-control', 'placeholder' => 'Konu Girin']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::textarea('message', null, ['class' => 'form-control', 'placeholder' => 'Mesajınızı Girin', 'rows' => 3]) }}
                        </div>
                        <button type="submit">Gönder</button>
                        {{ Form::close() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
