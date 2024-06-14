<x-tests.app>
    <x-slot name="header">ヘッダー２</x-slot>
    コンポーネントテスト２

    <x-test-class-base classBaseMessage="メッセ" />
    <div class="mb-4"></div>
    <x-test-class-base classBaseMessage="メッセ" defaultMessage="初期値から変更しています" />
</x-tests.app>