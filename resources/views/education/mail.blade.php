<p>Merhaba, Sayın Yönetici</p>
<p>Bir kullanıcı web sitenizde bulunan <strong>Eğitim Başvuru Formu</strong> aracılığı ile bir talep gönderdi. İlgili
    kullanıcının iletişim bilgileri ve diğer detaylar aşağıda yer almaktadır.</p>
<p class="text-danger">Lütfen bu mesajı yanıtlamayınız.</p>
<h4 class="mb-2">
    Kullanıcı Bilgileri
</h4>
<table class="table table-responsive table-bordered">
    <tbody>
        <tr>
            <td>
                <strong>
                    Adı Soyadı :
                </strong>
            </td>
            <td>
                {{ $data['name'] . '' . $data['surname'] }}
            </td>
        </tr>
        <tr>
            <td>
                <strong>
                    E-Posta :
                </strong>
            </td>
            <td>
                {{ $data['email'] }}
            </td>
        </tr>
        <tr>
            <td>
                <strong>
                    Telefon :
                </strong>
            </td>
            <td>
                {{ $data['phone'] }}
            </td>
        </tr>
        <tr>
            <td>
                <strong>
                    Talep Edilen Eğitim :
                </strong>
            </td>
            <td>
                @if ($data['type'] == 0)
                    IHA - 0 Eğitimi
                @elseif($data['type'] == 1)
                    IHA - 1 Eğitimi
                @elseif($data['type'] == 2)
                    Kapsamlı Eğitim
                @else
                    Bilinmiyor
                @endif
            </td>
        </tr>
    </tbody>
</table>
