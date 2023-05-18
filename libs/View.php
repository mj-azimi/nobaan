<?php

namespace Lib;

class View {
    public function render($viewName, $data = []) {
        // فایل قالب مورد نظر بر اساس نام نما
        $templateFile = __DIR__ . '/../views/' . $viewName . '.php';

        if (file_exists($templateFile)) {
            // استخراج داده‌ها از آرایه $data به عنوان متغیرها محلی
            extract($data);

            // رندر کردن نما با استفاده از فایل قالب
            ob_start();
            include $templateFile;
            $renderedView = ob_get_clean();

            // نمایش نما به کاربر
            echo $renderedView;
        } else {
            // اگر فایل قالب مورد نظر وجود نداشت
            echo 'Template file not found!';
        }
    }
}