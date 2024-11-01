<?php

/**
 * Error Messages
 * @since 3.1.2
 * @author Naim-Ul-Hassan
 */
class SimpleEcommErrorMessage
{

    public static function translate($message): string
    {
        return __($message, SIMPLEECOMMCART_TEXT_DOMAIN);
    }

    public static function NONCE_ERROR(): string
    {
        return self::translate("Invalid nonce, please refresh your screen and try again");
    }


    public static function CATEGORY_NAME_REQ(): string
    {
        return self::translate("Category name is required");
    }

    public static function COUPON_CODE_REQ(): string
    {
        return self::translate("Coupon Code is required");
    }

    public static function PRODUCT_NAME_REQ(): string
    {
        return self::translate("Product name is required");
    }

    public static function PRODUCT_PRICE_REQ(): string
    {
        return self::translate("Product price is required");
    }

    public static function ITEM_NUMBER_UNIQUE(): string
    {
        return self::translate("The item number must be unique");
    }

    public static function NO_FILE_AT_DOWNLOAD_PATH(): string
    {
        return self::translate("There is no file available at the download path : ");
    }

    public static function FILE_UPLOAD_UNABLE(): string
    {
        return self::translate("Unable to upload file");
    }

    public static function INVALID_DIGITAL_PRODUCT_FILE_FORMAT(): string
    {
        return self::translate("Invalid Digital product file format. allowed formats pdf, docx, xlxs, csv, pptx, mp4 and zip");
    }

    public static function INVALID_PRODUCT_IMAGE_FORMAT(): string
    {
        return self::translate("Invalid product image format. allowed formats jgeg, jpg, png and webp");
    }

    public static function INVALID_PRODUCT_BUTTON_IMAGE_FORMAT(): string
    {
        return self::translate("IInvalid product button image format. allowed formats jgeg, jpg, png and webp");
    }
}