using ProductionSimulation.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ProductionSimulation.Logic
{
    public class ProductionLogic
    {
        public List<Products> Products { get; set; }
        private cs_beugroContext _ctx;

        public ProductionLogic(cs_beugroContext ctx)
        {
            this._ctx = ctx;
        }

        private void SetupProducts()
        {
            this.Products = _ctx.Products.ToList<Products>();
        }
    }
}
