<x-tests.app>
    <x-slot name="header">ヘッダー１</x-slot>
    コンポーネントテスト１

    <!-- <x-tests.card title="タイトル" content="本文" :message="$message"></x-tests.card> -->
    <x-tests.card title="タイトル" content="本文" :message="$message" />
    <x-tests.card title="タイトル"  />
    <x-tests.card title="cssを変更したい" class="text-xl" />
</x-tests.app>