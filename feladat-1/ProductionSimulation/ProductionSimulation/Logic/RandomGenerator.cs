using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ProductionSimulation.Logic
{
    static class RandomGenerator
    {
        public static Random GetProductsRnd = new Random();
        public static Random ProductionRnd = new Random();
        public static Random StartDateRnd = new Random();
        public static Random EndDateRnd = new Random();
    }
}
