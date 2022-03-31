using ProductionSimulation.Logic;
using ProductionSimulation.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ProductionSimulation
{
    class Program
    {
        static void Main(string[] args)
        {
            cs_beugroContext ctx = new cs_beugroContext();
            ProductionLogic pl = new ProductionLogic(ctx);
            pl.SaveProdcution();
        }
    }
}
