<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy;

use GuzzleHttp\Client as GuzzleClient;
use CommunitySDKs\GoDaddy\Http\GuzzleTransport;
use CommunitySDKs\GoDaddy\Http\TransportInterface;
use CommunitySDKs\GoDaddy\Service\AbuseService;
use CommunitySDKs\GoDaddy\Service\AftermarketService;
use CommunitySDKs\GoDaddy\Service\AgreementsService;
use CommunitySDKs\GoDaddy\Service\AnsService;
use CommunitySDKs\GoDaddy\Service\AuctionsService;
use CommunitySDKs\GoDaddy\Service\CertificatesService;
use CommunitySDKs\GoDaddy\Service\CountriesService;
use CommunitySDKs\GoDaddy\Service\DomainsService;
use CommunitySDKs\GoDaddy\Service\OrdersService;
use CommunitySDKs\GoDaddy\Service\ParkingService;
use CommunitySDKs\GoDaddy\Service\ShoppersService;
use CommunitySDKs\GoDaddy\Service\SubscriptionsService;

final class Client
{
    private readonly ApiClient $apiClient;
    private readonly AbuseService $abuse;
    private readonly AftermarketService $aftermarket;
    private readonly AgreementsService $agreements;
    private readonly AnsService $ans;
    private readonly AuctionsService $auctions;
    private readonly CertificatesService $certificates;
    private readonly CountriesService $countries;
    private readonly DomainsService $domains;
    private readonly OrdersService $orders;
    private readonly ParkingService $parking;
    private readonly ShoppersService $shoppers;
    private readonly SubscriptionsService $subscriptions;

    public function __construct(?Config $config = null, ?TransportInterface $transport = null)
    {
        $config ??= new Config();
        $transport ??= new GuzzleTransport(new GuzzleClient());
        $this->apiClient = new ApiClient($config, $transport);
        $this->abuse = new AbuseService($this->apiClient);
        $this->aftermarket = new AftermarketService($this->apiClient);
        $this->agreements = new AgreementsService($this->apiClient);
        $this->ans = new AnsService($this->apiClient);
        $this->auctions = new AuctionsService($this->apiClient);
        $this->certificates = new CertificatesService($this->apiClient);
        $this->countries = new CountriesService($this->apiClient);
        $this->domains = new DomainsService($this->apiClient);
        $this->orders = new OrdersService($this->apiClient);
        $this->parking = new ParkingService($this->apiClient);
        $this->shoppers = new ShoppersService($this->apiClient);
        $this->subscriptions = new SubscriptionsService($this->apiClient);
    }

    public function apiClient(): ApiClient
    {
        return $this->apiClient;
    }

    public function abuse(): AbuseService
    {
        return $this->abuse;
    }

    public function aftermarket(): AftermarketService
    {
        return $this->aftermarket;
    }

    public function agreements(): AgreementsService
    {
        return $this->agreements;
    }

    public function ans(): AnsService
    {
        return $this->ans;
    }

    public function auctions(): AuctionsService
    {
        return $this->auctions;
    }

    public function certificates(): CertificatesService
    {
        return $this->certificates;
    }

    public function countries(): CountriesService
    {
        return $this->countries;
    }

    public function domains(): DomainsService
    {
        return $this->domains;
    }

    public function orders(): OrdersService
    {
        return $this->orders;
    }

    public function parking(): ParkingService
    {
        return $this->parking;
    }

    public function shoppers(): ShoppersService
    {
        return $this->shoppers;
    }

    public function subscriptions(): SubscriptionsService
    {
        return $this->subscriptions;
    }
}
