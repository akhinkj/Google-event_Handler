<?php
/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Bulkexports
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Twilio\Rest\Bulkexports\V1;

use Twilio\Options;
use Twilio\Values;

abstract class ExportConfigurationOptions
{

    /**
     * @param bool $enabled If true, Twilio will automatically generate every day's file when the day is over.
     * @param string $webhookUrl Stores the URL destination for the method specified in webhook_method.
     * @param string $webhookMethod Sets whether Twilio should call a webhook URL when the automatic generation is complete, using GET or POST. The actual destination is set in the webhook_url
     * @return UpdateExportConfigurationOptions Options builder
     */
    public static function update(
        
        bool $enabled = Values::BOOL_NONE,
        string $webhookUrl = Values::NONE,
        string $webhookMethod = Values::NONE

    ): UpdateExportConfigurationOptions
    {
        return new UpdateExportConfigurationOptions(
            $enabled,
            $webhookUrl,
            $webhookMethod
        );
    }

}


class UpdateExportConfigurationOptions extends Options
    {
    /**
     * @param bool $enabled If true, Twilio will automatically generate every day's file when the day is over.
     * @param string $webhookUrl Stores the URL destination for the method specified in webhook_method.
     * @param string $webhookMethod Sets whether Twilio should call a webhook URL when the automatic generation is complete, using GET or POST. The actual destination is set in the webhook_url
     */
    public function __construct(
        
        bool $enabled = Values::BOOL_NONE,
        string $webhookUrl = Values::NONE,
        string $webhookMethod = Values::NONE

    ) {
        $this->options['enabled'] = $enabled;
        $this->options['webhookUrl'] = $webhookUrl;
        $this->options['webhookMethod'] = $webhookMethod;
    }

    /**
     * If true, Twilio will automatically generate every day's file when the day is over.
     *
     * @param bool $enabled If true, Twilio will automatically generate every day's file when the day is over.
     * @return $this Fluent Builder
     */
    public function setEnabled(bool $enabled): self
    {
        $this->options['enabled'] = $enabled;
        return $this;
    }

    /**
     * Stores the URL destination for the method specified in webhook_method.
     *
     * @param string $webhookUrl Stores the URL destination for the method specified in webhook_method.
     * @return $this Fluent Builder
     */
    public function setWebhookUrl(string $webhookUrl): self
    {
        $this->options['webhookUrl'] = $webhookUrl;
        return $this;
    }

    /**
     * Sets whether Twilio should call a webhook URL when the automatic generation is complete, using GET or POST. The actual destination is set in the webhook_url
     *
     * @param string $webhookMethod Sets whether Twilio should call a webhook URL when the automatic generation is complete, using GET or POST. The actual destination is set in the webhook_url
     * @return $this Fluent Builder
     */
    public function setWebhookMethod(string $webhookMethod): self
    {
        $this->options['webhookMethod'] = $webhookMethod;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Bulkexports.V1.UpdateExportConfigurationOptions ' . $options . ']';
    }
}

