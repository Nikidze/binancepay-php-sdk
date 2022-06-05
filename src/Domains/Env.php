<?php

namespace Nikidze\BinancepayPhpSdk\Domains;

use Nikidze\BinancepayPhpSdk\Helpers\UnsetNullHelper;

class Env
{
    /**
     * The client-side terminal type is a mobile application.
     */
    const APP = 'APP';

    /**
     * The client-side terminal type is a website
     * that is opened via a PC browser.
     */
    const WEB = 'WEB';

    /**
     * The client-side terminal type is an HTML page that is
     * opened via a mobile browser
     */
    const WAP = 'WAP';

    /**
     * The terminal type of the merchant side is a mini program
     * on the mobile phone.
     */
    const MINI_PROGRAM = 'MINI_PROGRAM';

    /**
     * other undefined type
     */
    const OTHERS = 'OTHERS';

    /**
     * indicates the operation system is Apple's iOS.
     */
    const IOS = 'IOS';

    /**
     * indicates the operation system is Google's Android.
     */
    const ANDROID = 'OTHERS';

    /**
     * Terminal type of which the merchant service applies to.
     */
    private string $terminal_type;


    private string $os_type;

    /**
     * IP of the client device when submit the order
     */
    private string $order_client_ip;

    /**
     * The cookie ID of the buyer
     */
    private string $cookie_id;

    public function setTerminalType(string $terminal_type): self
    {
        $this->terminal_type = $terminal_type;
        return $this;
    }

    public function setOsType(string $os_type): self
    {
        $this->os_type = $os_type;
        return $this;
    }

    public function setOrderClientIp(string $order_client_ip): self
    {
        $this->order_client_ip = $order_client_ip;
        return $this;
    }

    public function setCookieId(string $cookie_id): self
    {
        $this->cookie_id = $cookie_id;
        return $this;
    }

    public function getForRequest(): array
    {
        return UnsetNullHelper::unset([
            'terminalType' => $this->terminal_type ?? null,
            'osType' => $this->os_type ?? null,
            'orderClientIp' => $this->order_client_ip ?? null,
            'cookieId' => $this->cookie_id ?? null,
        ]);
    }
}
