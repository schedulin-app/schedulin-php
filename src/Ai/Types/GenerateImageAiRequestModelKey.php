<?php

namespace Schedulin\Ai\Types;

enum GenerateImageAiRequestModelKey: string
{
    case FluxSchnell = "flux_schnell";
    case FluxDev = "flux_dev";
    case FluxProUltra = "flux_pro_ultra";
}
