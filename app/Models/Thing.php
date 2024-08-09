<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\LabelAlignment;
use Endroid\QrCode\QrCode;

class Thing extends Model
{
    use HasFactory, Uuid;

    protected $guarded = [];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function qrCodeBase64Image()
    {
        $qrCodeDataString = config('app.url') . '/found/' . $this->uuid;

        $qrCodeResult = Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data($qrCodeDataString)
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(ErrorCorrectionLevel::High)
            ->size(300)
            ->margin(10)
            ->roundBlockSizeMode(RoundBlockSizeMode::Margin)

            ->validateResult(false)
            ->build();

        $image = base64_encode($qrCodeResult->getString());

        return "data:image/png;base64," . $image;
    }


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->user_id)) {
                $model->user_id = auth()->id();
            }

            if (empty($model->uuid)) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }
}
